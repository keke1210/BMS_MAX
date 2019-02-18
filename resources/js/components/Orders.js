import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Axios from 'axios';

export default class Orders extends Component {
    constructor() {
        super();
        this.state = {
            data:[]
        }
    }

    componentWillMount() {
        let $this = this;

        const headers = {
            'Accept' : 'application/json',
            'Authorization': 'Bearer'+accessToken
        }
    
        Axios.get('http://127.0.0.1:8000/api/orders').then(response=>{
            console.log(response.headers);
        }).catch(error => {
            console.log(error);
        })
    }

    render() {
        return (
            <div>
                <h2>orders Listing</h2>
                <table className="table table-boarded">
                    <thead>
                        <tr>
                            <td>ID</td>
                        </tr>
                    </thead>
                    <tbody>
                        {this.state.data.map((order,i)=>(
                        <tr>
                            <td>{order.id}</td>
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

if (document.getElementById('orders')) {
    ReactDOM.render(<Orders />, document.getElementById('orders'));
}
