import * as types from '../actions';
import {selectHelper} from "../utils/select/selectHelper";
import {i_need_id, i_need_name} from "../Constansts/selectHelper";

export default function (state = {
    categories: {
        label: '',
        value: '',
    },
    products: [],

}, action) {
    const response = action.response;

    switch (action.type) {
        case types.GET_MISSIONS_SUCCESS:

            return {
                ...state, categories:
                    selectHelper(response, i_need_id)
            };
        case types.GET_MISSIONS_ERROR:
            return {
                ...state,
                response
            };

        case types.ADD_MISSIONS_SUCCESS:

            return {
                ...state, products: response
            };
        case types.ADD_MISSIONS_ERROR:
            return {
                ...state,
                response
            };

        default:
            return state;
    }
};
