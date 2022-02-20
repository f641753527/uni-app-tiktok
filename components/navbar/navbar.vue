<template>
  <view class="nav nav--container">
    <view class="left-icon" :class="left.iconClass" @click="() => left.event()"></view>
    <view class="nav--list"
      @click="navItemClick"
    >
      <text
        v-for="navItem in tabs"
        :key="navItem.id"
        class="nav--item"
        :class="{ 'active': activeId === navItem.id }"
        :data-id="navItem.id"
      >{{  navItem.name }}</text>
    </view>
  </view>
</template>

<script>
import propsConfig from './props'

export default {
  props: {
    activeId: {
      type: Number,
      required: true,
    },
    left: {
      type: Object,
      default: propsConfig.left
    },
    tabs: {
      type: Array,
      default: () => propsConfig.tabs
    },
  },
  methods: {
    navItemClick(e) {
      this.$emit('navItemClick', e.target.dataset.id)
    },
  },
}
</script>

<style lang='scss' scoped>
.nav--container{
  position: fixed;
  left: 0;
  right: 0;
  top: 48px;
  z-index: 2;
  .left-icon{
    font-size: 30px;
    font-weight: 700;
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translate(0, -50%);
  }
  .nav--list{
    text-align: center;
  }
  .nav--item{
    padding: 2px 10px;
    font-size: 16px;
    vertical-align: middle;
    &.active{
      font-size: 18px;
      font-weight: 700;
    }
  }
}
</style>