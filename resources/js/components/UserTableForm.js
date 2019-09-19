import React, {Component} from 'react';
import Typography from '@material-ui/core/Typography';
import Slider from '@material-ui/core/Slider';

export default class UserTableForm extends Component {
    constructor(props) {
        super(props);
        
        this.state = {
            input: '',
            per_page: 10
        }

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    componentDidMount() {
        this.setState({
            per_page: this.props.data
        });
    }

    handleChange(e, val) {
        this.setState({ per_page: val }, () => {
            this.handleSubmit();
        });
    }

    handleSubmit(e) {
        this.props.parentCallback(this.state.per_page);

    }

    render() {
        return(
            <form>
                <div onChange={this.handleChange} className="form-group limit-select">
                    <Typography id="discrete-slider" gutterBottom> Users per page: {this.state.per_page} </Typography>
                    <Slider
                        id="discrete-slider"
                        onChangeCommitted={this.handleChange}
                        step={1}
                        min={0}
                        max={50}
                        defaultValue={this.state.per_page}
                        marks
                        color={"primary"}
                        valueLabelDisplay="auto"
                     />
                </div>
            </form>
        )
    }

}