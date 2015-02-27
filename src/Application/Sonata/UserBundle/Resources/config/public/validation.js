/**
 * Validate methods
 */
var Validate = {
	inn: function (value) {
		value = this._trim(value);
		if(!value.match(/^\d*$/)) {
			return false;
		}

		if(typeof(arguments[1]) == 'boolean') {
			if(
				arguments[1] === true && value.length != 12
				|| arguments[1] === false && value.length != 10
			) {
				return false
			}
		}

		var s;
		if(value.length == 10) {
			s = (2*value[0] + 4*value[1] + 10*value[2] + 3*value[3] + 5*value[4] + 9*value[5] + 4*value[6] + 6*value[7] + 8*value[8]) % 11;
			s = (s == 10 ? 0 : s);
			return (s == value[9]);
		}
		else if(value.length == 12) {
			s = (7*value[0] + 2*value[1] + 4*value[2] + 10*value[3] + 3*value[4] + 5*value[5] + 9*value[6] + 4*value[7] + 6*value[8] + 8*value[9]) % 11;
			s = (s == 10 ? 0 : s);

			var s2 = (3*value[0] + 7*value[1] + 2*value[2] + 4*value[3] + 10*value[4] + 3*value[5] + 5*value[6] + 9*value[7] + 4*value[8] + 6*value[9] + 8*value[10]) % 11;
			s2 = (s2 == 10 ? 0 : s2);
			return (s == value[10] && s2 == value[11]);
		}

		return false;
	},

	kpp: function(value) {
		value = this._trim(value);
		return (value.length != 9 || !value.match(/^\d*$/) ? false : true);
	},

	ogrn: function(value) {
		value = this._trim(value);
		if(!value.match(/^\d*$/)) {
			return false;
		}

		var mod;
		if(value.length == 15) {
			if(value[0] != 3 && value[0] != 4) {
				return false;
			}

			mod = parseInt(parseFloat(value.substring(0, 14)) % 13);
			if(mod > 9) {
				mod = mod - Math.round(mod/10)*10;
			}
			if(mod != value[14]) {
				return false;
			}

			return true;
		}
		else if(value.length == 13) {
			if(value[0] != 1 && value[0] != 2 && value[0] != 5 && value[0] != 6 && value[0] != 7 && value[0] != 8 && value[0] != 9) {
				return false;
			}

			mod = parseInt(parseFloat(value.substring(0, 12)) % 11);
			if(mod > 9) {
				mod = mod - Math.round(mod/10)*10;
			}
			if(mod != value[12]) {
				return false;
			}

			return true;
		}

		return false;
	},

	okpo: function(value) {
		if(!value.match(/^\d*$/)) {
			return false;
		}

		var w = 1, sum = 0, mod, i;
		for(i = 0; i < value.length - 1; i++) {
			sum += parseInt(value[i])*w;

			w++;
			if(w >= 10) {
				w = 1;
			}
		}

		mod = sum % 11;
		if(mod == 10) {
			w = 3, sum = 0;
			for(i = 0; i < value.length - 1; i++) {
				sum += parseInt(value[i])*w;

				w++;
				if(w >= 10) {
					w = 1;
				}
			}
			mod = sum % 11;
		}

		if(mod == 10) {
			mod = 0;
		}

		return (mod == parseInt(value[value.length - 1]));
	},

	bankbik: function(value) {
		value = this._trim(value);
		return (value.length != 9 && value.length != 8 || !value.match(/^\d*$/) ? false : true);
	},

	bankaccount: function(account, bik) {
		if(account.length != 20 || bik.length != 9 && bik.length != 8 || !account.match(/^\d*$/) || !bik.match(/^\d*$/)) {
			return false;
		}
		if(bik.length == 8) {
			bik = '0' + bik;
		}

		var	accounts = [bik.substring(6) + account, '0' + bik.substring(4, 6) + account],
			weights = [7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1],
			sum = 0;
		for(var a = 0; a < accounts.length; a++) {
			sum = 0;
			for(var i = 0; i < accounts[a].length; i++) {
				sum += parseInt(accounts[a][i]) * weights[i];
			}
			if((sum % 10) == 0) {
				return true;
			}
		}
		return false;
	},

	bankcorraccount: function(value) {
		value = this._trim(value);
		return (value.length != 20 || !value.match(/^\d*$/) ? false : true);
	},

	email: function(value) {
		value = this._trim(value);
		return /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(value);
	},

	pass: function(value) {
		value = this._trim(value);
		return (value.length < 6 ? false : true);
	},

	passport: function(value) {
		value = this._trim(value);
		return /^[0-9]{2}\s[0-9]{2}\s[0-9]{6}$/.test(value);
	},

	phone: function(value) {
		var digits = value.replace(/[^0-9]+/g, '');
		return (digits.length == 10 || digits.length == 11 ? true : false);
	},
	url: function(value) {
		value = this._trim(value);
		return /^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/.test(value);
	},

	id_1c: function(value) {
		return /^[a-f0-9]{8}\-[a-f0-9]{4}\-[a-f0-9]{4}\-[a-f0-9]{4}\-[a-f0-9]{12}$/.test(value);
	},

	waybillCdek: function(value) {
		return /^([0-9]{7}|[0-9]{10})$/.test(value);
	},

	waybillEms: function(value) {
		return /^EA[0-9]{9}[A-Z]{2}$/.test(value);
	},

	waybillPost: function(value) {
		return /^[0-9]{14}$/.test(value);
	},

	waybillDellin: function(value) {
		return /^([Ð-Ð¯]{2}|[0-9]{2})\-[0-9]{11}$/i.test(value);
	},

	waybillPek: function(value) {
		return /^([Ð-Ð¯]{7}|[Ð-Ð¯]{2}\([Ð-Ð¯]{2}\)[Ð-Ð¯]{5})\-[0-9]{1,2}\/[0-9]{4}$/.test(value);
	},

	waybillBs: function(value) {
		return /^[Ð-Ð¯]{2}\-[0-9]{6}$/i.test(value);
	},

	waybillAutotrade: function(value) {
		return /^[Ð-Ð¯]{3,5}\-[0-9]{5}$/i.test(value);
	},

	waybillEnergy: function(value) {
		return /^([Ð-Ð¯]{3}\-[0-9]{6}|[0-9]{3}\-[0-9]{7})$/i.test(value);
	},

	_trim: String.prototype.trim && !String.prototype.trim.call("\uFEFF\xA0") ?
		function(text) {
			return (text == null ? "" : String.prototype.trim.call(text));
		} :
		function(text) {
			return (text == null ? "" : (text + "").replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, ""));
		}
};