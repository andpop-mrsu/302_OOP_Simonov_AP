// src/fraction.js
function createFraction(num, denom) {
    if (denom === 0) throw new Error('Denominator cannot be zero');

    // Нормализация дроби (сокращение на НОД)
    function gcd(a, b) {
        a = Math.abs(a);
        b = Math.abs(b);
        while (b) {
            [a, b] = [b, a % b];
        }
        return a;
    }

    function normalize(n, d) {
        const sign = n * d < 0 ? -1 : 1;
        const absNum = Math.abs(n);
        const absDenom = Math.abs(d);
        const divisor = gcd(absNum, absDenom);
        return {
            numerator: sign * (absNum / divisor),
            denominator: absDenom / divisor
        };
    }

    const { numerator, denominator } = normalize(num, denom);

    return {
        getNumer() {
            return numerator;
        },
        getDenom() {
            return denominator;
        },
        add(frac) {
            const newNum = this.getNumer() * frac.getDenom() + frac.getNumer() * this.getDenom();
            const newDenom = this.getDenom() * frac.getDenom();
            return createFraction(newNum, newDenom);
        },
        sub(frac) {
            const newNum = this.getNumer() * frac.getDenom() - frac.getNumer() * this.getDenom();
            const newDenom = this.getDenom() * frac.getDenom();
            return createFraction(newNum, newDenom);
        },
        toString() {
            const whole = Math.floor(Math.abs(numerator) / denominator);
            const remainder = Math.abs(numerator) % denominator;
            if (whole === 0 && remainder === 0) return '0';
            if (whole === 0) return `${numerator}/${denominator}`;
            if (remainder === 0) return `${numerator < 0 ? -whole : whole}`;
            return `${numerator < 0 ? '-' : ''}${whole}'${remainder}/${denominator}`;
        }
    };
}

export { createFraction };