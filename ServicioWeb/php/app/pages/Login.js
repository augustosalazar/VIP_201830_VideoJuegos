import React, {Component} from 'react';
import {StyleSheet, Text, View,Alert,Button} from 'react-native';

import Form from '../components/Form';

import {onSignIn} from '../Auth';

export default class Login extends Component {

    _onPressSend = (elnombre,elcorreo) => {
        //Alert.alert('_onPressSend '+elnombre);
        onSignIn().then(() => this.props.navigation.navigate("SignedIn"));
    }

    _onPressSignUp = () => {
       // Alert.alert('_onPressSignUp');
       this.props.navigation.navigate("Signup");
    }

  render() {
    return (
      <View style={styles.container}>
        <Form  title='Login' _onPressSend={this._onPressSend}/>
        <Text style={styles.textButton} onPress={this._onPressSignUp}>Nuevo? Sign Up!</Text>
      </View>
    );
  }
}

const styles = StyleSheet.create({
  container: {

  },
  textButton:{
    margin:10,
    color:'blue',
  }
});
