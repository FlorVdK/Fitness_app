import React from 'react';
import { Button, View, Text, TextInput, ActivityIndicator } from 'react-native';
import { createStackNavigator, createAppContainer } from 'react-navigation'; // 1.0.0-beta.27
import Pusher from 'pusher-js/react-native';

import pusherConfig from './pusher.json';

const _apiServer = 'http://192.168.5.156:81/api/'

class HomeScreen extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      text: '',
      test: ''
    };
  }

  checkQuizCode = (e)=>{
    if(this.state.text.length>0){
      fetch(_apiServer + 'checkQuizCode/' + this.state.text)
        .then((response) => response.json())
        .then((responseJson) => {
          if(responseJson){
            this.props.navigation.navigate('Nickname', {
              quizcode: this.state.text,
            });
          }else{
            console.log('eros')
          }
        })
        .catch((error) =>{
          console.error(error);
        });
    }
  }

  render() {
    return (
      <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
        <Text>Give Quiz Code</Text>
        <TextInput
          placeholder="Quiz code"
          onChangeText={(text) => this.setState({text})}
        />
        <Button
          title="Enter quiz"
          onPress={this.checkQuizCode}
        />
        <Text style={{padding: 10, fontSize: 42}}>
          {this.state.test}
        </Text>
      </View>
    );
  }
}




class NicknameScreen extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      nickname: '',
      quizcode: props.navigation.getParam('quizcode', '')
    };
  }

  makeNewTempUser = (e)=>{
    if(this.state.nickname.length>0){
      fetch(_apiServer + 'makeNewTempUser', {
        method: 'POST',
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          nickname: this.state.nickname,
          quizcode: this.state.quizcode,
        }),
      })
        .then((response) => response.json())
        .then((responseJson) => {
          if(responseJson){
            console.log(responseJson)
              this.props.navigation.navigate('Question', {
                  data: responseJson,
              });
          }
        })
        .catch((error) =>{
          console.error(error);
        });
    }
  }

  render() {
    /* 2. Get the param, provide a fallback value if not available */
    const { navigation } = this.props;
    const itemId = navigation.getParam('itemId', 'NO-ID');
    const otherParam = navigation.getParam('otherParam', 'some default value');

    return (
      <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
        <Text>choose nickname</Text>
        <TextInput
          placeholder="nickname"
          onChangeText={(nickname) => this.setState({nickname})}
        />
        <Button
          title="Enter"
          onPress={this.makeNewTempUser}
        />
      </View>
    );
  }
}

class QuestionScreen extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            data: props.navigation.getParam('data', ''),
            isLoading: true,
            answers : []
        };
        this.pusher = new Pusher(pusherConfig.key, pusherConfig); // (1)

        this.chatChannel = this.pusher.subscribe('quiz-session-' + this.state.data['data']['quiz_sessions_id']); // (2)
        this.chatChannel.bind('pusher:subscription_succeeded', () => { // (3)
            this.chatChannel.bind('new.question', (data) => { // (4)
                this.handleAnswers(data);
            });
        });
    }

    handleAnswers(data){
        const answers = [];
        data['answers'].forEach(function(element){
            answers.push(element);
        })
        this.setState({
            answers: answers,
            isLoading: false
        });
    }


    render() {
        /* 2. Get the param, provide a fallback value if not available */
        if(this.state.isLoading){
            return(
                <View style={{flex: 1, padding: 20}}>
                    <ActivityIndicator/>
                </View>
            )
        }
        console.log(this.state.answers);

        return (
            <View style={{ flex: 1, alignItems: 'stretch',
                flexDirection: 'column',
                justifyContent: 'space-evenly', }}>
                { this.state.answers.map((item, key)=>(
                    <Button
                        style={{height: 50}}
                        title = {item['answer']}
                        onPress={this.checkQuizCode}
                        key={key}
                    />)
                )}
            </View>
        );
    }
}

const RootStack = createStackNavigator(
  {
    Home: {
      screen: HomeScreen,
    },
    Nickname: {
      screen: NicknameScreen,
    },
      Question: {
          screen: QuestionScreen,
      },
  },
  {
    initialRouteName: 'Home',
  }
);

const AppContainer = createAppContainer(RootStack);

export default class App extends React.Component {
  render() {
    return <AppContainer />;
  }
}