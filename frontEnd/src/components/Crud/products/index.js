import React, {Component} from 'react';
import {connect} from "react-redux";


import Select from "react-select";
import {addMissionsAction, getMissionsAction} from "../../../actions/missionsActions";


class Products extends Component {
    constructor(props, context) {
        super(props, context);
        this.state = {
            multiValue: [],
            multiValueSelect: []
        };
        this.handleMultiChange = this.handleMultiChange.bind(this);
    }

    componentDidMount() {

        this.props.getMissionsAction();
        this.props.addMissionsAction(null);
    }


    handleMultiChange(option) {

        if (option.value) {
            let obj = {
                category_id: option.value
            };
            this.props.addMissionsAction(obj);
        }
        this.setState({
            multiValue: option
        });

    }

    componentWillReceiveProps(nextProps, nextContext) {
        if (nextProps.categories !== this.props.categories) {
            this.setState({
                multiValueSelect: nextProps.categories
            })
        }
    }

    render() {
        const {products} = this.props;
        const {multiValue, multiValueSelect} = this.state;
        return (

            <div className='container divEx1'>
                <div className='row'>
                    <div className='col col-12 table-index'>
                        <Select
                            name="filters"
                            placeholder="Filters"
                            value={multiValue}
                            options={multiValueSelect}
                            onChange={this.handleMultiChange}
                        />
                    </div>

                </div>


                <div className='row'>
                    <div className="col col-12 ">

                        <ul>
                            {
                                products && products.map((product) =>
                                    <div className="table-index">
                                        <li>name :{product.name}</li>
                                        <li>description :{product.description}</li>
                                        <li>price : {product.price}</li>
                                        {
                                            product.categories &&
                                            product.categories.map((categories) =>
                                                <ul>
                                                    <li> Sub categorie name:{categories.name}</li>
                                                </ul>
                                            )
                                        }

                                    </div>
                                )
                            }</ul>
                    </div>

                </div>
            </div>
        )

    }
}


const mapDispatchToProps = {
    getMissionsAction,
    addMissionsAction
};

function mapStateToProps(state) {
    return {
        categories: state.adminRes.categories,
        products: state.adminRes.products,
    };
}

export default connect(mapStateToProps, mapDispatchToProps)(Products);
