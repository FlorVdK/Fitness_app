import axios from 'axios';

const server = 'http://192.168.5.156:8000';
const basePath = '/api'

export const api = {
    get: async (url, params = {}) => {
        console.log(server + basePath + '/' + url + '/' + params);
        return await axios({
            method: 'GET',
            url: server + basePath + '/' + url + '/' + params
          }).then(e => e.data).catch(e => console.warn(e))
    },

    post: async (url, body) => {
        return await axios({
            method: 'POST',
            url: server + basePath + '/' + url,
            body: body
          })
    }
}
