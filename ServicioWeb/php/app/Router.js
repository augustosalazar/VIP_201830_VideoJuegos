import React from "react";

import {
    createStackNavigator,
    createSwitchNavigator
} from "react-navigation";

import Login from './pages/Login';
import Signup from './pages/Signup';
import Home from './pages/Home';


export const SignedOut  = createStackNavigator({

    Login:{
        screen: Login,
        navigationOptions: {
            header:null
        }
    },
    Signup:{
        screen: Signup,
        navigationOptions: {
            title: "Sign Up",
        }
    }

});

export const SignedIn  = createStackNavigator({

    Home:{
        screen: Home,
    },
});

export const rootNavigator = (value = false) => {
  return createSwitchNavigator(
  {
      SignedIn:{
          screen:SignedIn
      },
      SignedOut:{
          screen:SignedOut
      }
  },
  {
      initialRouteName: value ? "SignedIn" : "SignedOut"
    }
  );
};
