import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import configureStore from './store/configureStore';

import App from './App';
import './index.css';
import registerServiceWorker from "./config/registerServiceWorker";
const store = configureStore();

store.subscribe(() => console.log("new Store", store.getState()));
ReactDOM.render(

  <Provider store={store}>
    <App />
  </Provider>
  , document.getElementById('root'));
registerServiceWorker();


