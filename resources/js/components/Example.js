import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Axios from 'axios';

export default class Example extends Component {
    constructor() {
        super();
        this.state = {
            data:[]
        }
    }

    componentWillMount() {
        let $this = this;
    
        Axios.get('http://127.0.0.1:8000/api/products').then(response=>{
            $this.setState({
                data: response.data
            })
        }).catch(error => {
            console.log(error);
        })
    }


    render() {
        return (
            <div>
                <h2>Products Listing</h2>
                <table className="table table-boarded">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Cmimi</td>
                        </tr>
                    </thead>
                    <tbody>
                        {this.state.data.map((product,i)=>(
                        <tr>
                            <td>{product.prod_id}</td>
                            <td>{product.name}</td>
                            <td>{product.cmimi}</td>
                            <td><a href="#" className="btn btn-primary">Edit</a> || 
                            <a href="#" className="btn btn-danger">Delete</a></td>
                        </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
