<script>
	export default {
		onLaunch: function() {
			console.log('App Launch')
			// 隐藏tabbar
			uni.hideTabBar()
		},
		onShow: function() {
			console.log('App Show')
		},
		onHide: function() {
			console.log('App Hide')
		}
	}
</script>

<style>
	/*每个页面公共css */
	@import url('/assets/iconfont/iconfont.css');
	page {
		background-color: #000;
		color: #FFF;
	}
</style>
