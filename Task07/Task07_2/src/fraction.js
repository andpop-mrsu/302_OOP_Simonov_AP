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
  
  function Fraction(num, denom) {
    const { numerator, denominator } = normalize(num, denom);
    this.numerator = numerator;
    this.denominator = denominator;
  }
  
  Fraction.prototype.getNumer = function () {
    return this.numerator;
  };
  
  Fraction.prototype.getDenom = function () {
    return this.denominator;
  };
  
  Fraction.prototype.add = function (frac) {
    const newNum = this.numerator * frac.getDenom() + frac.getNumer() * this.denominator;
    const newDenom = this.denominator * frac.getDenom();
    return new Fraction(newNum, newDenom);
  };
  
  Fraction.prototype.sub = function (frac) {
    const newNum = this.numerator * frac.getDenom() - frac.getNumer() * this.denominator;
    const newDenom = this.denominator * frac.getDenom();
    return new Fraction(newNum, newDenom);
  };
  
  Fraction.prototype.toString = function () {
    const whole = Math.floor(Math.abs(this.numerator) / this.denominator);
    const remainder = Math.abs(this.numerator) % this.denominator;
    if (whole === 0 && remainder === 0) return '0';
    if (whole === 0) return `${this.numerator}/${this.denominator}`;
    if (remainder === 0) return `${this.numerator < 0 ? -whole : whole}`;
    return `${this.numerator < 0 ? '-' : ''}${whole}'${remainder}/${this.denominator}`;
  };
  
  export { Fraction };