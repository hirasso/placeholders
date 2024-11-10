import fs from 'node:fs';

/**
 * Dump and die
 * @param {Array<any>} args
 */
export function dd(...args) {
  console.log(...args);
  process.exit();
}

/**
 * Checks if a file exists at the given path.
 * @param {string} path - The path to the file.
 * @returns {boolean} - Returns true if the file exists, false otherwise.
 */
export const fileExists = (path) => fs.existsSync(path);

/**
 * print an error and exit
 * @param {string} message - The error message
 */
export const error = (message) => {
  console.error(message);
  process.exit(1);
};

/**
 * Colors
 */
export const c = {
  reset: "\x1b[0m",
  red: "\x1b[31m",
  green: "\x1b[32m",
  yellow: "\x1b[33m",
  blue: "\x1b[34m"
}
