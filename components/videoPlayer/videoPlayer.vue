<template>
  <video
    id="videoContext"
    class="video-player"
    :autoplay="autoplay"
    :src="videoItem.url"
    :loop="loop"
    :controls="controls"
  ></video>
</template>

<script>
export default {
  props: {
    videoItem: {
      type: Object,
      required: true,
    },
    autoplay: {
      type: Boolean,
      default: false,
    },
    loop: {
      type: Boolean,
      default: true,
    },
    controls: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      videoContext: null,
    }
  },
  onReady() {
    this.videoContext = uni.createVideoContext('videoContext', this)
  },
  methods: {
    play() {
      this.videoContext.play()
    },
    pause() {
      this.videoContext.pause()
    },
    stop() {
      this.videoContext.seek(0)
      this.videoContext.stop()
    },
  },
}
</script>

<style scoped lang='scss'>
.video-player{
  width: 100%;
  height: 100%;
}
</style>