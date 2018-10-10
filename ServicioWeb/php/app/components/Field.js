import React, {Component} from 'react';
import {StyleSheet, Text, View,TextInput,Button,Alert} from 'react-native';

export default class Field extends Component {

    constructor(props){
      super(props);
    }
  
    render() {
      return(
  
          <View style={styles.caja}>
          <Text style={styles.subtitulo}>{this.props.texto}</Text>
          <TextInput
              style={styles.entradaTexto}
              placeholder={'Digite aquí el '+ this.props.texto}
              value={this.props.value}
              secureTextEntry={this.props.esClave}
              onChangeText ={this.props.onChangeText}
          />
        </View>
  
      );
    }
  }
  

const styles = StyleSheet.create({
    caja:{
      flexDirection:'row'
    },
    subtitulo: {
      flex:1,
      fontSize: 14,
      marginLeft:10,
      marginBottom:10,
    },
    entradaTexto: {
      flex:3,
      marginLeft:10,
      marginRight:10,
      marginBottom:10,
      borderWidth:0.5,
      borderRadius:5,
      padding:4,
    },
  });