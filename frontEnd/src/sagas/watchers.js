import {takeLatest} from 'redux-saga/effects';

import * as types from '../actions';

import {addMissionsSaga, getMissionsSaga} from "./crud/missions/mission";

export default function* watchUserAuthentication() {

    yield takeLatest(types.ADD_MISSIONS, addMissionsSaga);
    yield takeLatest(types.GET_MISSIONS, getMissionsSaga);


}
