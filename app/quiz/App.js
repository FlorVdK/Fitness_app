import React from 'react';
import { Button, View, Text, TextInput } from 'react-native';
import { createStackNavigator, createAppContainer } from 'react-navigation'; // 1.0.0-beta.27
import { api } from './services/api';

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

const RootStack = createStackNavigator(
  {
    Home: {
      screen: HomeScreen,
    },
    Nickname: {
      screen: NicknameScreen,
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