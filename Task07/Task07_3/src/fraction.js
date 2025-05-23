// src/fraction.js
function gcd(a, b) {
    a = Math.abs(a);
    b = Math.abs(b);
    while (b) {
      [a, b] = [b, a % b];
    }
    return a;
  }
  
  function normalize(num, denom) {
    if (denom === 0) throw new Error('Denominator cannot be zero');
    const sign = num * denom < 0 ? -1 : 1;
    const absNum = Math.abs(num);
    const absDenom = Math.abs(denom);
    const divisor = gcd(absNum, absDenom);
    return {
      numerator: sign * (absNum / divisor),
      denominator: absDenom / divisor,
    };
  }
  
  class Fraction {
    constructor(num, denom) {
      const { numerator, denominator } = normalize(num, denom);
      this._numerator = numerator;
      this._denominator = denominator;
    }
  
    get numerator() {
      return this._numerator;
    }
  
    get denominator() {
      return this._denominator;
    }
  
    add(frac) {
      const newNum = this._numerator * frac.denominator + frac.numerator * this._denominator;
      const newDenom = this._denominator * frac.denominator;
      return new Fraction(newNum, newDenom);
    }
  
    sub(frac) {
      const newNum = this._numerator * frac.denominator - frac.numerator * this._denominator;
      const newDenom = this._denominator * frac.denominator;
      return new Fraction(newNum, newDenom);
    }
  
    toString() {
      const whole = Math.floor(Math.abs(this._numerator) / this._denominator);
      const remainder = Math.abs(this._numerator) % this._denominator;
      if (whole === 0 && remainder === 0) return '0';
      if (whole === 0) return `${this._numerator}/${this._denominator}`;
      if (remainder === 0) return `${this._numerator < 0 ? -whole : whole}`;
      return `${this._numerator < 0 ? '-' : ''}${whole}'${remainder}/${this._denominator}`;
    }
  }
  
  export { Fraction };