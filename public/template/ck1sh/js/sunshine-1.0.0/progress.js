"use strict";
define(
	['jquery'],
	function($){
	/**
	 * @desc Get key of progress
	 * @param [object] {$progressItem} object of the progress bar
	 * @param [bool] {isNew} unique identifier of the progress
	 * @return [string] {progress} key
	 * @author Weixun Luo
	 * @date 2015-02-20
	 */
	var getProgressKey = function($progressItem, isNew){
		var rand = $progressItem.data('rand');
		if(isNew === true){
			rand = (new Date).getTime();
			$progressItem.data('rand', rand);
		}
		// return current progress key
		return $progressItem.data('pkey') + rand;
	};

	/**
	* @method Trace progress of the script and display
	* @param [Element] {$progressItem} object of the progress bar
	* @param [int] {tryTimes} request failed times
	* @return void
	* @author Weixun Luo
	* @date 2015-02-20
	*/
	var traceProgress = function($progressItem, tryTimes){
		var maxTryTiems = 6; // 请求允许失败最大次数
		var progressKey = getProgressKey($progressItem);
		var $displayInner = $progressItem.children('div');
		var isOver = false;
		if(tryTimes === undefined){
			// 进度跟踪初次调用，一系列初始化操作
			tryTimes = 0;
			$progressItem.hide().removeClass('hide');
			$displayInner.width('0%').text('0%');
		}
		tryTimes++;
		// 请求获取进度信息
		$.get("?r=progress/trace" + "&pkey=" + progressKey,
			function(result, status){
				if(status === 'success'){
					if(result.status){
						var progress = result.progress;
						if(progress.usable){
							// 进度数据有效
							tryTimes = 0;
							var seed = parseInt(progress.seed);
							var total = parseInt(progress.total);
							if(progress.total != 0 && progress.seed != 0){
								if($progressItem.is(":hidden")){$progressItem.show().addClass('active');}
								var rate = Math.floor((seed <= total ? (seed / total) : 1) * 100);
								var holdWidth = $progressItem.width();
								var currentWidth = $displayInner.width();
								var currentRate = Math.floor(currentWidth/ holdWidth * 100);
								for (var i = currentRate; i <= rate; i++) {
									// 进度条步进效果
									$displayInner.width(i+'%').text(i+'%');
								};
								if(rate >= 100){
									// 进度结束
									$progressItem.removeClass('active');
									isOver = true;
								}
							}
						}
					}
				}
				// 检测是否结束进度跟踪
				if(tryTimes < maxTryTiems && !isOver){
					// 进度跟踪未结束，1秒后再次请求
					return setTimeout(function(){
						traceProgress($progressItem, tryTimes)}, 800)
				}
			});
	};

	return {
		getProgressKey: getProgressKey,
		traceProgress: traceProgress,
	};
});