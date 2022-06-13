import axios from "axios";

class CookieBox {
  constructor(config) {
    this.section = config.section;
    this.acceptAllButton = this.section.querySelector(
      "#cookieboxAcceptAllButton"
    );
    this.acceptMinimumButton = this.section.querySelector(
      "#cookieboxAcceptMinimumButton"
    );
    this.saveButton = this.section.querySelector("#cookieboxSaveButton");
    this.inputs = [...this.section.querySelectorAll(".cookiebox__input")];

    this.addEventListeners();
  }

  addEventListeners = () => {
    this.saveButton.addEventListener("click", this.submitForm);
    this.acceptAllButton.addEventListener("click", this.onClickAcceptAll);
    this.acceptMinimumButton.addEventListener(
      "click",
      this.onClickAcceptMinimum
    );
  };

  onClickAcceptAll = () => {
    this.inputs.forEach((input) => {
      input.checked = true;
    });
    this.submitForm();
  };

  onClickAcceptMinimum = () => {
    this.inputs.forEach((input) => {
      if (input.dataset.locked == "true") {
        input.checked = true;
      } else {
        input.checked = false;
      }
    });
    this.submitForm();
  };

  submitForm = () => {
    console.log("submitForm");

    const ajaxUrl = `/wp-json/api/cookiebox/`;

    const values = [];
    this.inputs.forEach((input) => {
      values.push([input.value, input.checked]);
    });

    const data = {
      cookiebox: values,
    };

    axios
      .post(ajaxUrl, data, {
        headers: this.headers,
      })
      .then((response) => {
        location.reload();
      })
      .catch((error) => {
        console.log(error);
      });
  };
}

export default CookieBox;
