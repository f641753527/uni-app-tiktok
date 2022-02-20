<template>
  <view
    class="tab-item"
    :class="{ 'is-active': active }"
    :style="{ justifyContent: textAlign, alignItems: verticalAlign }"
    @click="tabClick(tabConfig)"
  >
    <text
      v-if="!tabConfig.icon"
      class="tab-item__name"
      :style="{
        fontSize,
        color: active ? activeColor : color,
        fontWeight: active ? 700 : 500,
      }"
    >
      {{ tabConfig.name }}
    </text>
    <view
      v-else
      class="tab-item--icon"
    >
      <text class="iconfont" :class="tabConfig.icon"></text>
    </view>
  </view>
</template>

<script>
import tabbarItemProps from './props.js'

export default{
  props: {
    tabConfig: {
      type: Object,
      required: true,
    },
    active: {
      type: Boolean,
      required: true
    },
    textAlign: {
      type: String,
      default: tabbarItemProps.textAlign
    },
    verticalAlign: {
      type: String,
      default: tabbarItemProps.verticalAlign
    },
    fontSize: {
      type: String,
      default: tabbarItemProps.fontSize
    },
    color: {
      type: String,
      default: tabbarItemProps.color
    },
    activeColor: {
      type: String,
      default: tabbarItemProps.activeColor
    },
  },
  methods: {
    tabClick(tab) {
      uni.switchTab({ url: tab.path })
    },
  },
}
</script>

<style lang="scss" scoped>
.tab-item{
  height: 100%;
  display: flex;
}
.tab-item--icon{
  padding: 1px 8px;
  border: 2px solid #FFF;
  border-radius: 5px;
  .iconfont{
    color: #FFF;
    font-size: 16px;
  }
}
</style>
