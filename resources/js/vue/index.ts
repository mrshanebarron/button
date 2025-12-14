import LdButton from './LdButton.vue'

export { LdButton }

export default {
  install(app: any) {
    app.component('LdButton', LdButton)
  },
}
