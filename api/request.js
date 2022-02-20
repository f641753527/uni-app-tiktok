const BASE_URL = 'https://mock.mengxuegu.com/mock/61b9aed2ca09cb42105ae342'

export default function fetch(config = {}) {
  return new Promise((resolve, reject) => {
    uni.request({
      ...config,
      url: `${BASE_URL}${config.url}`,
      success: (response) => {
        const res = response.data
        const { code, data, message } = res
        if (code !== 0 ) return reject(message)
        return resolve(data)
      }
    })
  })
}
