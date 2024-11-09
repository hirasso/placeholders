import fs from "fs";
import { parseArgs } from "node:util";
import { dd } from "./utils.js";

const reset = "\x1b[0m";
const red = "\x1b[31m";
const green = "\x1b[32m";
const yellow = "\x1b[33m";
const blue = "\x1b[34m";

const distignoreFile = ".distignore";

/**
 * Parse the command-line arguments
 */
const args = parseArgs({
  options: {
    exclude: { type: "string" }, // Define `--exclude` for excluded files and folders
  },
  allowPositionals: false,
});
const excludes = args.values.exclude
  ? args.values.exclude.split(",").map((exclude) => exclude.trim())
  : [];

/**
 * Checks if a file exists at the given path.
 * @param {string} path - The path to the file.
 * @returns {boolean} - Returns true if the file exists, false otherwise.
 */
const fileExists = (path) => fs.existsSync(path);

/**
 * print an error and exit
 * @param {string} message - The error message
 */
const error = (message) => {
  console.error(message);
  process.exit(1);
};

/**
 * Get a headline
 * @param {string[]} lines - The headline text
 * @return {string} - The resulting headline string
 */
const getHeadline = (lines) => {
  const longestLine = lines.reduce((longest, current) => {
    return current.length >= longest.length ? current : longest;
  }, "");

  const dashes = `#${"-".repeat(longestLine.length + 2)}#`;
  const formattedLines = lines.map((line) => {
    const spaces = " ".repeat(longestLine.length - line.length);
    return `# ${line} ${spaces}#`;
  });

  return (
    "\n" +
    [dashes, ...formattedLines, dashes].map((line) => line.trim()).join("\n") +
    "\n\n"
  );
};

generateDistignore();

/**
 * Main function to generate .distignore from .gitignore and .gitattributes
 */
function generateDistignore() {
  /** Check if .gitattributes exists */
  if (!fileExists(".gitattributes")) {
    error(".gitattributes file not found!");
  }

  /** Check if .gitignore exists */
  if (!fileExists(".gitignore")) {
    error(".gitignore file not found!");
  }

  /** Create or overwrite the .distignore file with a header */
  fs.writeFileSync(
    distignoreFile,
    getHeadline([
      "⛔️ DO NOT EDIT THIS FILE DIRECTLY ⛔️",
      "Use `pnpm distignore:generate` instead.",
      "",
      "All entries in this file will be ignored",
      "when distributing to WordPress",
    ]),
  );

  /** Create or overwrite the .distignore file with a header */
  fs.appendFileSync(distignoreFile, getHeadline(["From .gitignore:"]));

  /** Read and append .gitignore content to .distignore */
  const gitignoreContent = fs.readFileSync(".gitignore", "utf8");
  fs.appendFileSync(distignoreFile, `${gitignoreContent}\n`);

  /** Append header for .gitattributes content */
  fs.appendFileSync(distignoreFile, getHeadline(["From .gitattributes:"]));

  /**
   * Read .gitattributes and process each line
   * If a line ends with " export-ignore", it removes that part and appends the rest to .distignore
   */
  const gitattributesContent = fs.readFileSync(".gitattributes", "utf8");
  const gitattributesLines = gitattributesContent.split("\n");
  const distignoreLines = gitattributesLines
    .filter((line) => line.endsWith(" export-ignore"))
    .map((line) => line.replace(" export-ignore", ""));

  /** Append processed lines from .gitattributes to .distignore */
  fs.appendFileSync(distignoreFile, `${distignoreLines.join("\n")}\n`);

  console.log(
    `${green}✔ ${distignoreFile} generated from .gitignore and .gitattributes.${reset}`,
  );

  /** Read .distignore and filter out lines starting with excluded files/folders */
  const distignoreContent = fs.readFileSync(".distignore", "utf8");
  const filteredContent = distignoreContent
    .split("\n")
    .filter((line) => !excludes.some((exclude) => line.startsWith(exclude)))
    .join("\n");

  /** Write the filtered content back to .distignore */
  fs.writeFileSync(distignoreFile, filteredContent);

  if (excludes.length) {
    console.log(
      `${green}✔ excluded:${reset}\n`,
      excludes.map((exclude) => `${blue}  - ${exclude}${reset}`).join("\n"),
    );
  }
}
