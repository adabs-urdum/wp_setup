import axios from "axios";

class RestClass {
  constructor() {
    this.headers = {
      "Content-Type": "application/json",
      "X-WP-Nonce": RestSettings.nonce,
    };
  }

  sendRequest = () => {
    const ajaxUrl = `/wp-json/api/addtocart`;

    const data = {};

    axios
      .post(ajaxUrl, data, {
        headers: this.headers,
      })
      .then((response) => {
        console.log(response);
      })
      .catch((error) => {
        console.log(error);
      });
  };
}

export default RestClass;
