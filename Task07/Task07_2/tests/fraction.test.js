// tests/fraction.test.js
import { Fraction } from '../src/fraction';

describe('Fraction (Constructor and Prototype)', () => {
  test('should create a fraction with normalized values', () => {
    const frac = new Fraction(6, 4);
    expect(frac.getNumer()).toBe(3);
    expect(frac.getDenom()).toBe(2);
  });

  test('should handle negative fractions', () => {
    const frac = new Fraction(-6, 4);
    expect(frac.getNumer()).toBe(-3);
    expect(frac.getDenom()).toBe(2);
  });

  test('should add fractions correctly', () => {
    const frac1 = new Fraction(1, 2);
    const frac2 = new Fraction(1, 3);
    const result = frac1.add(frac2);
    expect(result.getNumer()).toBe(5);
    expect(result.getDenom()).toBe(6);
    expect(result.toString()).toBe('5/6');
  });

  test('should subtract fractions correctly', () => {
    const frac1 = new Fraction(3, 4);
    const frac2 = new Fraction(1, 4);
    const result = frac1.sub(frac2);
    expect(result.getNumer()).toBe(1);
    expect(result.getDenom()).toBe(2);
    expect(result.toString()).toBe('1/2');
  });

  test('should return proper string representation', () => {
    expect(new Fraction(5, 2).toString()).toBe('2\'1/2');
    expect(new Fraction(-5, 2).toString()).toBe('-2\'1/2');
    expect(new Fraction(3, 4).toString()).toBe('3/4');
    expect(new Fraction(0, 4).toString()).toBe('0');
  });

  test('should throw error for zero denominator', () => {
    expect(() => new Fraction(1, 0)).toThrow('Denominator cannot be zero');
  });
});