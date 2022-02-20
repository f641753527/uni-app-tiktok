<template>
  <swiper
    class="swiper--list" :vertical="true"
    @change="handleVideoChange"
  >
    <swiper-item
      v-for="(videoItem, index) in playList"
      :key="videoItem.id"
    >
      <videoPlayer
        ref="videoRefList"
        :videoItem="videoItem"
      ></videoPlayer>
    </swiper-item>
  </swiper>
</template>

<script>
import { PLAY_TYPE } from '../navbar/props'

export default {
  props: {
    isActive: {
      type: Boolean,
      default: false,
    },
    playList: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      activeIndex: 0,
      initialed: false,
    }
  },
  created() {

  },
  mounted() {
    if (this.isActive) {
      this.$nextTick(() => {
        this.$refs.videoRefList[this.activeIndex].play()
      })
    }
  },
  methods: {
    handleVideoChange({ detail }) {
      this.$refs.videoRefList[this.activeIndex].stop()
      this.activeIndex = detail.current
      this.$refs.videoRefList[this.activeIndex].play()
    },
  },
  watch: {
    isActive(active) {
      if (!active) {
        this.$refs.videoRefList[this.activeIndex].pause()
      } else {
        this.$refs.videoRefList[this.activeIndex].play()
      }
    }
  },
}
</script>

<style lang="scss" scoped>
.swiper--list{
  height: 100vh;
}
</style>