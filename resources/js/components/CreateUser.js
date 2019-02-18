import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Axios from 'axios';

export default class CreateUser extends Component {
    constructor() {
        super();
        this.state = {
            data:[]
        }
    }


    render() {
        return (
            <div className="container">
                <div>
                    <form>
                        <h2>User Create</h2>
                        <hr />

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" className="email" required />

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" className="psw" required />

                        <label for="psw-repeat"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" className="psw-repeat" required />
                        <hr />

                        <button type="submit" class="registerbtn">Register</button>
                    </form>
                </div>
            </div>
        );
    }
}

if (document.getElementById('CreateUser')) {
    ReactDOM.render(<CreateUser />, document.getElementById('createuser'));
}
