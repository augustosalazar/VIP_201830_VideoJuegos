import React, {Component} from 'react';
import {StyleSheet, Text, View,TextInput,Button,Alert} from 'react-native';

import Field from './Field'

export default class Form extends Component {

 constructor(props){
   super(props);
   this.state = {correo: '',clave: ''};
 }

  _onPress = () => {
    this.props._onPressSend(this.state.correo,this.state.clave);
  }

  _onChangeCorreo = (value) => {
    this.setState({correo: value})
  }

  _onChangeClave = (value) => {
    this.setState({clave: value})
  }

  render() {
    return (
      <View style={styles.container}>
        <Text style={styles.titulo}>{this.props.title}</Text>

        <Field texto='Correo' value={this.state.correo} onChangeText={this._onChangeCorreo} esClave={false}/>

        <Field texto='Clave' value={this.state.clave} onChangeText={this._onChangeClave} esClave={true}/>

        <Button
          title="Enviar"
          style={styles.elbutton}
          onPress={this._onPress}
        />

      </View>

    );
  }
}

const styles = StyleSheet.create({
  container: {
    paddingTop:25,
  },
  caja:{
    flexDirection:'row'
  },
  titulo: {
    fontSize: 20,
    fontWeight:'bold',
    textAlign:'center',
    marginBottom:10,
  },
  subtitulo: {
    flex:1,
    fontSize: 16,
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
    padding:4
  },
  entradaTextoCorreo: {
    flex:3,
    marginLeft:10,
    marginRight:10,
    marginBottom:10,
    borderWidth:0.5,
    borderRadius:5,
    padding:4,
  },
  elbutton:{
    marginLeft:30,
  }
});
