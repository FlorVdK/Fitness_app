import React, { Component } from "react";
import { View, Text, TextInput, TouchableOpacity, Alert } from "react-native";

import Pusher from "pusher-js/react-native";
import Config from "react-native-config";

import axios from "axios";

const pusher_app_key = Config.PUSHER_APP_KEY;
const pusher_app_cluster = Config.PUSHER_APP_CLUSTER;
const base_url = "http://a92fe64c.ngrok.io/api";

class LoginScreen extends Component {
  static navigationOptions = {
    header: null
  };

  state = {
    username: "",
    quizcode: "",
    userId:'',
    channelId:'',
    enteredQuiz: false
  };

  constructor(props) {
    super(props);
    this.pusher = null;
  }

  render() {
    return (
      <View style={styles.wrapper}>
        <View style={styles.container}>
          <View style={styles.main}>
            <View>
              <Text style={styles.label}>Enter your username</Text>
              <TextInput
                style={styles.textInput}
                onChangeText={username => this.setState({ username })}
                value={this.state.username}
              />
            </View>

            <View>
              <Text style={styles.label}>Enter the Quizcode</Text>
              <TextInput
                style={styles.textInput}
                onChangeText={quizcode => this.setState({ quizcode })}
                value={this.state.quizcode}
              />
            </View>

            {!this.state.enteredQuiz && (
              <TouchableOpacity onPress={this.enterQuiz}>
                <View style={styles.button}>
                  <Text style={styles.buttonText}>Login</Text>
                </View>
              </TouchableOpacity>
            )}

            {this.state.enteredQuiz && (
              <Text style={styles.loadingText}>Loading...</Text>
            )}
          </View>
        </View>
      </View>
    );
  }


  enterQuiz = async () => {
    const myUsername = this.state.username;
    const currentQuizcode = this.state.quizcode;

    if (myUsername && currentQuizcode) {
      this.setState({
        enteredQuiz: true,
        userId:'',
        channelId:'',
      });

      this.pusher = new Pusher(pusher_app_key, {
        cluster: pusher_app_cluster,
        encrypted: true
      });
      
      try {
        await axios.post(
          `${base_url}/makeNewTempUser`, 
          {
            nickname: myUsername,
            quizcode: currentQuizcode
          }
        )
        .then((response) => {
          console.log(response);
            this.userId= response['data']['data']['id'],
            this.channelId=response['data']['data']['quiz_sessions_id']
        });
        console.log('logged in!');
      } catch (err) {
        console.log(`error logging in ${err}`);
      }

      this.quizChannel = this.pusher.subscribe('quiz-session-'+this.channelId);
      this.quizChannel.bind("pusher:subscription_error", (status) => {
        console.log(
          "Error",
          "Subscription error occurred. Please restart the app"
        );
      });

      this.quizChannel.bind("pusher:subscription_succeeded", () => {
       
        this.props.navigation.navigate("Quiz", {
          pusher: this.pusher,
          myUsername: myUsername,
          currentQuizcode: currentQuizcode,
          userId:this.userId,
          channelId:this?channelId,
          quizChannel: this.quizChannel
        });

        this.setState({
          username: "",
          quizcode: "",
          enteredQuiz: false
        });

      });

    }
  };


}

export default LoginScreen;

const styles = {
  wrapper: {
    flex: 1
  },
  container: {
    flex: 1,
    alignItems: "center",
    justifyContent: "center",
    padding: 20,
    backgroundColor: "#FFF"
  },
  fieldContainer: {
    marginTop: 20
  },
  label: {
    fontSize: 16
  },
  textInput: {
    height: 40,
    marginTop: 5,
    marginBottom: 10,
    borderColor: "#ccc",
    borderWidth: 1,
    backgroundColor: "#eaeaea",
    padding: 5
  },
  button: {
    alignSelf: "center",
    marginTop: 10
  },
  buttonText: {
    fontSize: 18,
    color: "#05a5d1"
  },
  loadingText: {
    alignSelf: "center"
  }
};