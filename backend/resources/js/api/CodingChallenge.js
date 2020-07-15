import axios from '../config/axios';

export default {
    getMissionsService() {
        return axios.get('categories')
    },
    addMissionsService(data) {
        return axios.post('products/listing/products', data)
    },
}
