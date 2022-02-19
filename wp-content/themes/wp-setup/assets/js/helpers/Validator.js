class Validator {
  constructor() {
    console.log("new Validator");

    this.data = null;

    this.letters =
      "0-9A-Za-zÁÀȦÂÄǞǍĂĀÃÅǺǼǢĆĊĈČĎḌḐḒÉÈĖÊËĚĔĒẼE̊ẸǴĠĜǦĞG̃ĢĤḤáàȧâäǟǎăāãåǻǽǣćċĉčďḍḑḓéèėêëěĕēẽe̊ẹǵġĝǧğg̃ģĥḥÍÌİÎÏǏĬĪĨỊĴĶǨĹĻĽĿḼM̂M̄ʼNŃN̂ṄN̈ŇN̄ÑŅṊÓÒȮȰÔÖȪǑŎŌÕȬŐỌǾƠíìiîïǐĭīĩịĵķǩĺļľŀḽm̂m̄ŉńn̂ṅn̈ňn̄ñņṋóòôȯȱöȫǒŏōõȭőọǿơP̄ŔŘŖŚŜṠŠȘṢŤȚṬṰÚÙÛÜǓŬŪŨŰŮỤẂẀŴẄÝỲŶŸȲỸŹŻŽẒǮp̄ŕřŗśŝṡšşṣťțṭṱúùûüǔŭūũűůụẃẁŵẅýỳŷÿȳỹźżžẓǯßœŒçÇ";

    this.regexpatterns = {
      name: `([${this.letters}\\s-]){2,}`,
      lastname: `([${this.letters}\\s-]){2,}`,
      street: `[${this.letters}\\s\\.-\\d]{0,}`,
      zipcity: `([\\d]){4}\\s([${this.letters}\\s-.]){2,}`,
      zip: `([\\d]){4}`,
      city: `([${this.letters}\\s-.]){2,}`,
      mail: `[${this.letters}_.-]{1,}@[${this.letters}_-]{1,}[.]{1}[${this.letters}]{2,3}`,
      pass: `.{5,}`,
    };

    this.errors = {};
  }

  setData = (data) => {
    this.labels = data;

    this.inputs = Object.keys(this.labels).map((key) => {
      return this.labels[key].querySelector("input");
    });
  };

  checkErrors = () => {
    this.errors = {};
    this.data = {};
    this.inputs.forEach((input) => {
      this.checkError(input);
    });
  };

  checkError = (input) => {
    const name = input.name;
    const str = input.value;

    console.log(name);

    this.errors[name] = false;

    if (this.regexpatterns[name]) {
      const regex = new RegExp(this.regexpatterns[name]);
      const match = str.match(regex);
      const exactMatch = match && str === match[0];

      if (!exactMatch) {
        console.log("error");
        input.classList.add("error");
        this.errors[name] = true;
        return;
      }
    }
    if (str.length === 0) {
      console.log("nothing here");
      input.classList.add("error");
      this.errors[name] = true;
      return;
    } else {
      console.log("good");
      input.classList.remove("error");
      this.data[name] = str;
    }
  };
}

export default Validator;
