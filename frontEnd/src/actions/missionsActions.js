import * as types from "./index";

export const getMissionsAction = () => {
    return {
        type: types.GET_MISSIONS,

    }
};

export const addMissionsAction = (obj) => {
    return {
        type: types.ADD_MISSIONS,
        payload: {obj: obj}
    }
};
