<template>
	<view class="page--container">
		<navbar :activeId="activeNavId" @navItemClick="handleNavItemClick"></navbar>
		<view v-if="activeNavId === PLAY_TYPE.SUGGESTED && playListSuggest.length">
			<playList
				:isActive="activeNavId === PLAY_TYPE.SUGGESTED"
				:playList="playListSuggest"
			></playList>
		</view>
		<view v-if="activeNavId === PLAY_TYPE.NEAR_BY && playListNear.length">
			<playList
				:isActive="activeNavId === PLAY_TYPE.NEAR_BY"
				:playList="playListNear"
			></playList>
		</view>
		<tabbar></tabbar>
	</view>
</template>

<script>
	import navbar from '@/components/navbar/navbar'
	import { PLAY_TYPE } from '@/components/navbar/props.js'
	import fetch from '@/api/request'

	export default {
		components: { navbar },
		data() {
			return {
				activeNavId: PLAY_TYPE.SUGGESTED,
				PLAY_TYPE,
				playListSuggest: [],
				playListNear: [],
			}
		},
		created() {
			this.getListSuggest()
			this.getListNear()
		},
		methods: {
			handleNavItemClick(id) {
				this.activeNavId = id
			},
			getListSuggest() {
				fetch({ url: '/api/videos/suggest' }).then(res => {
					this.playListSuggest = res.list
				})
			},
			getListNear() {
				fetch({ url: '/api/videos/near' }).then(res => {
					this.playListNear = res.list
				})
			},
		}
	}
</script>

<style>

</style>
