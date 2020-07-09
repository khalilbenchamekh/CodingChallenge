import {Url} from "../../../Env/env";

export const getMissionsService = (payload) => {
    const LOGIN_API_ENDPOINT = Url + 'api/categories';
    const parameters = {
        method: 'GET',
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Content-Type': 'application/json',
        },

    };

    return fetch(LOGIN_API_ENDPOINT, parameters)
        .then(response => {
            return response.json();
        })
        .then(json => {
            return json;
        });
};

export const addMissionsService = (payload) => {
    const LOGIN_API_ENDPOINT = Url + 'api/products/listing/products';
    let obj = payload.payload.obj;
    const parameters = {
        method: 'POST',
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Content-Type': 'application/json',
        },
        body: obj ? JSON.stringify(obj) : null
    };
    return fetch(LOGIN_API_ENDPOINT, parameters)
        .then(response => {
            return response.json();
        })
        .then(json => {
            return json;
        });
};


