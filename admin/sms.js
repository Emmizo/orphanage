class SMS {
    constructor() {
      this.api_key = 'XPn_j0f_RNGPVBk0jhpZJA==';
      // this.to ='250785126331';
      this.to ='250786529470';
      this.message = "Orphan accepted, we will contact you for next step!";
    }
  
    async sendSMS(user) {
      const smsResponse = await fetch(`https://platform.clickatell.com/messages/http/send?apiKey=${this.api_key}&to=${this.to}&content=${this.message}`);
      const response = await smsResponse.json();
  
      return {
        response
      }
    }
  }

