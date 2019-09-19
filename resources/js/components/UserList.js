import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

import Button from '@material-ui/core/Button';

import UserTableForm from './UserTableForm';


export default class UserList extends Component {

    constructor(props) {
        super(props);

        this.state = {
            users: [],
            data: [],
            open_filter: false,
            page_num: 1,
            per_page: 10,
            loading: true
        }

        this.getUsers = this.getUsers.bind(this);
        this.nextPage = this.nextPage.bind(this);
        this.prevPage = this.prevPage.bind(this);
        this.getDataFromUserForm = this.getDataFromUserForm.bind(this);
        this.handleFilterClick = this.handleFilterClick.bind(this);

    }
 
    componentDidMount() {
        this.getUsers();
    }

    getDataFromUserForm(data) {
        this.setState({ per_page: data }, () => this.getUsers() );
    }

    handleFilterClick() {
        this.setState({ open_filter: !this.state.open_filter }, () => console.log(this.state.open_filter));
    }

    nextPage() {
        this.setState({ page_num: this.state.page_num + 1 }, 
           () => this.getUsers());
    }

    prevPage() {
        this.setState({ page_num: this.state.page_num - 1 }, 
           () => this.getUsers());
    }

    getUsers() {    
        if(this.state.page_num >= this.state.data.last_page) {
            this.setState({
                page_num: 1
            });
        }
        if(this.state.page_num + 1 >= this.state.data.last_page) {
            document.querySelector('.btn-next').disabled = true;
        } else {
            document.querySelector('.btn-next').disabled = false;
        }

        if(this.state.page_num - 1 == 0) {
            document.querySelector('.btn-prev').disabled = true;
        } else {
            document.querySelector('.btn-prev').disabled = false;
        }

        this.setState({ loading: true })

        var url = `/users?page=${this.state.page_num}&per_page=${this.state.per_page}`;

        axios.get(url)
        .then( res => {
            // console.log(res.data);
            this.setState({ 
                users: res.data.data,
                data: res.data,
                loading: false
            });
        });
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">
                                Users list
                                <UserTableForm data={this.state.per_page} parentCallback={this.getDataFromUserForm} />
                            </div>
                            <div className="card-body">
                                {this.state.loading && 
                                    <div className="sk-cube-grid">
                                        <div className="sk-cube sk-cube1"></div>
                                        <div className="sk-cube sk-cube2"></div>
                                        <div className="sk-cube sk-cube3"></div>
                                        <div className="sk-cube sk-cube4"></div>
                                        <div className="sk-cube sk-cube5"></div>
                                        <div className="sk-cube sk-cube6"></div>
                                        <div className="sk-cube sk-cube7"></div>
                                        <div className="sk-cube sk-cube8"></div>
                                        <div className="sk-cube sk-cube9"></div>
                                    </div>
                                }
                                {!this.state.loading && 
                                    <table className="table table-borderless">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Surname</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        {this.state.users.map((user) =>
                                        <tr key={user.id}>
                                            <th scope="row">{user.id}</th>
                                            <td>{user.username}</td>
                                            <td>{user.fname}</td>
                                            <td>{user.lname}</td>
                                        </tr>
                                        )}
                                        </tbody>
                                    </table>
                                }
                                <div className="row p-2 justify-content-center">
                                    <button onClick={this.prevPage} className="btn btn-outline-light mr-1 btn-prev">Prev page</button>
                                    <button onClick={this.nextPage} className="btn btn-outline-light ml-1 btn-next">Next page</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<UserList />, document.getElementById('example'));
}