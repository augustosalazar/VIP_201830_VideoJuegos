import React, {Component} from 'react';
import {StyleSheet, Text, View,Alert,Button} from 'react-native';

import {onSignOut} from '../Auth';

export default class Home extends Component {

onPress = () => {
   // Alert.alert('log out');
   onSignOut().then(() => this.props.navigation.navigate('SignedOut'));
}

componentDidMount() {
    this.props.navigation.setParams({ onPress: this.onPress });
  }

  static navigationOptions = ({ navigation }) => {
    return {
    headerRight: (
      <Button
       onPress={navigation.getParam('onPress', () => console.log('no item!'))}
      title='Logout' />
    )
   };
  };

  render() {
    return (
      <View style={styles.container}>
         <Text>El Home</Text>
      </View>
    );
  }
}

const styles = StyleSheet.create({
  container: {
    paddingTop:25,
  }
});
