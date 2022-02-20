<template>
  <view class="tabbar tabbar--container" :style="{ height, backgroundColor }">
    <tabbarItem
      class="tab-item--component"
      v-for="(tab, i) in tabList"
      :key="tab.path"
      :active="currentPage === tab.path"
      :tab-config="tab"
    >
    </tabbarItem>
  </view>
</template>

<script>
import tabbarProps from './props'

export default {
  props: {
    tabList: {
      type: Array,
      required: true,
      default: () => tabbarProps.tabList
    },
    height: {
      type: String,
      default: tabbarProps.height
    },
    backgroundColor: {
      type: String,
      default: tabbarProps.backgroundColor,
    },
  },
  
  computed: {
    currentPage() {
      const pages = getCurrentPages()
      return `/${pages[pages.length - 1].route}`
    }
  },
}
</script>

<style lang='scss' scoped>
.tabbar{
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  display: flex;
  .tab-item--component{
    flex: 1 1 auto;
    height: 100%;
  }
}
</style>