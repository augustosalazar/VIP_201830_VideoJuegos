import React, {Component} from 'react';
import {StyleSheet, Text, View,Alert} from 'react-native';

import Form from '../components/Form'

export default class Signup extends Component {

    _onPressSend = (elnombre,elcorreo) => {
        Alert.alert('_onPressSend '+elnombre);
    }


  render() {
    return (
      <View style={styles.container}>
        <Form  title='Signup' _onPressSend={this._onPressSend}/>
      </View>
    );
  }
}

const styles = StyleSheet.create({
  container: {

  }
});
