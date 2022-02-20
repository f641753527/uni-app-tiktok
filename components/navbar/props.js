export const PLAY_TYPE = {
  SUGGESTED: 2,
  NEAR_BY: 1,
}

export default {
  left: {
    iconClass: 'iconfont icon-sousuo',
    event: () => {}
  },
  tabs: [
    {
      name: '同城',
      id: PLAY_TYPE.NEAR_BY,
    },
    {
      name: '推荐',
      id: PLAY_TYPE.SUGGESTED,
    },
  ],
}
