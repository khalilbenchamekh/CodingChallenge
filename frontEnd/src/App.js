import React, {Component} from 'react';
import './App.css';
import Products from "./components/Crud/products";

class App extends Component {
    render() {
        return (
            <div className="App">
                <header className="App-header">
                    <Products/>
                </header>
            </div>
        );
    }
}

export default App;
