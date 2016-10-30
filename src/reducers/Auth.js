import { LOGIN_USER_REQUEST, LOGIN_USER_SUCCESS, LOGIN_USER_FAILURE, LOGOUT_USER } from '../constants/ActionTypes'

const initialState = {
  id: null,
  userName: null,
  isAuthenticated: false,
  isAuthenticating: false,
  token: null,
  statusText: null
}


export default function Auth(state = initialState, action) {
  switch (action.type) {
    case LOGIN_USER_REQUEST:
      return {
        ...state,
        isAuthenticating: true,
        statusText: null
      }

    case LOGIN_USER_SUCCESS:
      return {
        state,
        isAuthenticating: true,
        statusText: null
      }

    case LOGIN_USER_FAILURE:
      return {
        state,
        authenticating: false
      }

    case LOGOUT_USER:
      return {
        state,
        authenticating: false
      }
    default:
      return state
  }
}
