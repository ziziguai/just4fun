"use strict";
define ('ajax', function(){
    var Message = function (options){
        var defaults = {
            type        : 'success',
            text        : ''
        };

        this._container = $('body');
        this._options = $.extend(defaults, options);

    };

    Message.prototype = {
        show: function(){
            var $container = this._container;
            this.remove();

            var iconClass = "ok";

            if (this._options.type == 'error'){
                iconClass = "icon-info-sign";
            }
            var $overlay = $('<div class="message-overlay"></div>');
            var $box = $('<div class="message-box message-'+this._options.type+'" ><i class="'+iconClass+'" style="opacity:0.3;"></i> '+this._options.text+'</div>');

            $container.append($overlay.append($box).fadeIn(400));
        },

        remove: function(){
            var $overlay = this._container.children(".message-overlay");
            if ($overlay.length) {
                $overlay.delay(3600).fadeOut(600, function() {
                    $overlay.remove();
                });
            }
        },

        flash: function(){
            this.show();
            this.remove();
        }

    };

    var Loading = function (options){
        defaults = {};
        this._container = $('body');
        this._options = $.extend(defaults, options);
        this.show();
    };

    Loading.prototype = {
        show: function(){
            var $container = this._container;
            this.remove();

            var $overlay = $('<div class="loading-overlay"></div>');
            var $box = $('<div class="loading-box"><div style="padding-top:48px; color:#fff;">Please wait ... </div></div>');

            $container.append($overlay.append($box).fadeIn(150));
        },

        remove: function(){
            var $overlay = this._container.children(".loading-overlay");
            if ($overlay.length) {
                $overlay.fadeOut(600, function() {
                    $overlay.remove();
                });
            }
        }

    };

    var save = function(url, payload, callback, failCallback){
        ajax({
            type        : "POST",
            url         : url,
            data        : payload,
            callback    : callback,
            failCallback: failCallback
        });
    };

    var load = function(url, callback, failCallback){
        ajax({
            type        : "GET",
            url         : url,
            callback    : callback,
            failCallback: failCallback
        });
    };

    var saveForm = function(url, $form, callback, failCallback, data){
        this.resetForm($form);
        ajax({
            type        : "POST",
            url         : url,
            data        : data? $.param(data):$($form).serialize(),
            callback    : callback,
            failCallback: failCallback
        }, 
        {
            success     : function(data){
                //laravel json always send 200 even the status code is set to an error code
                if (data && data.errorCode){
                    switch (data.errorCode){
                        case 401:
                            new Message({type:'error', text: data.errorMessage}).show();
                            break;

                        case 400:
                            //validation message
                            if (data.errorDetails){
                                var message = '';
                                $.each(data.errorDetails, function(key, value) {
                                    //style
                                    $($form).find('label[for="'+key+'"]').parent().addClass('error');     
                                    //message
                                    message += '<p>'+value+'</p>';
                                });

                                $($form).append('<div class="alert alert-error" ">'+message+'</div>');
                            }

                            break;
                        default:
                            new Message({type:'error', text: data.errorMessage}).flash();
                    }

                    loading.remove();

                    if (failCallback){
                        failCallback(data);
                    }
                    return;
                }else if(callback){
                    callback(data);
                }
                loading.remove();
                new Message({text: 'Save successfully!'}).flash();
            }
        });
    }

    var resetForm = function($form){
        $($form).find('.alert').remove();
        $($form).find('.control-group').removeClass('error');
    }

    var ajax = function(options, override){
        var _options = {
            type        : options.type,
            url         : options.url,
            dataType    : "json",
            data        : options.data? options.data:'',
            timeout     : 20000,
            cache       : false,
            success     : function(data){
                //laravel json always send 200 even the status code is set to an error code
                if (data && data.errorCode){
                    switch (data.errorCode){
                        case 401:
                            new Message({type:'error', text: data.errorMessage}).show();
                            break;

                        default:
                            new Message({type:'error', text: data.errorMessage}).flash();
                    }

                    loading.remove();

                    if (options.failCallback){
                        options.failCallback(data);
                    }
                    return;
                }else if(options.callback){
                    options.callback(data);
                }
                loading.remove();

                if(_options.type==='POST'){
                    new Message({text: 'Save successfully!'}).flash();
                }
            },
            error       : function(jqXHR, message, errorThrow) {
                switch (jqXHR.status) {
                    case 0:
                        if (message == "timeout"){
                            new Message({type:'error', text: 'Request timeout!'}).flash();
                        }
                        break;

                    case 401:
                        new Message({type:'error', text: jqXHR.responseText}).show();
                        break;
                    
                    default:
                        new Message({type:'error', text: jqXHR.responseText}).flash();
                        break;
                }
                loading.remove();
            }
        };
        //override options
        _options = $.extend({}, _options, override);
        loading = new Loading();
        $.ajax(_options);
    }

    return {
        Loading     : Loading,
        Message     : Message,
        save        : save,
        load        : load,
        saveForm    : saveForm,
        resetForm   : resetForm
    };

});