import React, {Component} from 'react';
import ReactDOM from 'react-dom';

class App extends Component {
    constructor (props) {
        super(props)
        this.state = {
            number1: '',
            number2: '',
            result: '',
        }

        this.onChangeValue = this.onChangeValue.bind(this);
        this.onSubmitButton = this.onSubmitButton.bind(this);
    }

    onChangeValue(e) {
        this.setState({
            [e.target.name]: e.target.value
        });
    }

    async onSubmitButton(e) {
        e.preventDefault();

        const {data} = await axios.post('/api/calculate', {
            number1: this.state.number1,
            number2: this.state.number2,
        })

        this.setState({
            result: data.result,
        })
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Calculator</div>

                            <div className="card-body">
                                <form onSubmit={this.onSubmitButton}>
                                    <input type={"number"}
                                           name={"number1"}
                                           placeholder={"Number 1"}
                                           value={this.state.number1}
                                           onChange={this.onChangeValue}
                                           className={'form-input'}/>
                                    +
                                    <input type={"number"}
                                           name={"number2"}
                                           placeholder={"Number 2"}
                                           value={this.state.number2}
                                           onChange={this.onChangeValue}
                                           className={'form-input'}/>

                                    <button className="button">Submit</button>

                                    <span className={"card-result"}>
                                {this.state.result ? `= ${this.state.result}` : ''}
                            </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
