export default class Gate {
    
    constructor(user) {
        this.user = user
    }

    authenticatedUser() {
        return this.user
    }

    authenticatedUserID() {
        return this.user.id
    }
}