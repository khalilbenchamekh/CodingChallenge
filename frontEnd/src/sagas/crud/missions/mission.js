import {call, put} from "redux-saga/effects";
import * as types from "../../../actions";
import {
    addMissionsService,
    getMissionsService
} from "../../../services/crud/missions/missionService";

export function* getMissionsSaga(payload) {
    try {
        yield [];
        let response = yield call(getMissionsService, payload);
        if (response.data) {
            let data = response.data;
            yield [
                put({type: types.GET_MISSIONS_SUCCESS,response: data}),
            ];
        } else {
            yield [
                put({type: types.GET_MISSIONS_ERROR, error: response.error}),
            ];

        }

    } catch (error) {
        yield [
            put({type: types.GET_MISSIONS_ERROR, error}),
        ];
    }
}

export function* addMissionsSaga(payload) {
    try {
        yield [];
        let response = yield call(addMissionsService, payload);
        if (response.data) {
            let data = response.data;
            yield [
                put({type: types.ADD_MISSIONS_SUCCESS, response:data}),
            ];
        } else {
            yield [
                put({type: types.ADD_MISSIONS_ERROR, error: response.error}),
            ];

        }

    } catch (error) {
        yield [
            put({type: types.ADD_MISSIONS_ERROR, error}),
        ];
    }
}


