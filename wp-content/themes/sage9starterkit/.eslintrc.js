module.exports = {
  "root": true,
  "extends": "eslint:recommended",
  "globals": {
    "wp": true
  },
  "env": {
    "node": true,
    "es6": true,
    "amd": true,
    "browser": true,
    "jquery": true
  },
  "parserOptions": {
    "ecmaFeatures": {
      "globalReturn": true,
      "generators": false,
      "objectLiteralDuplicateProperties": false,
      "experimentalObjectRestSpread": true
    },
    "ecmaVersion": 2017,
    "sourceType": "module"
  },
  "plugins": [
    "import"
  ],
  "settings": {
    "import/core-modules": [],
    "import/ignore": [
      "node_modules",
      "\\.(coffee|scss|css|less|hbs|svg|json)$"
    ]
  },
  "rules": {
    "no-console": process.env.NODE_ENV === 'production' ? 2 : 0,
    "comma-dangle": [
      "error",
      {
        "arrays": "always-multiline",
        "objects": "always-multiline",
        "imports": "always-multiline",
        "exports": "always-multiline",
        "functions": "ignore"
      }
    ],
    'no-mixed-spaces-and-tabs': 0,
    'no-unused-vars': 0,
    'no-undef': 0,
    'no-irregular-whitespace': 0,
    'quotes': ['error', 'single'],
    'no-extra-semi': 0,
    'no-empty': 0,
    'quotes': 0,
    'no-func-assign': 0,
    'no-useless-escape': 0,
    'babel/no-invalid-this': 0,
    'constructor-super': 0,
    'no-this-before-super': 0,
    'no-redeclare': 0,
    'no-control-regex': 0,
    'no-cond-assign': 0,
    'no-compare-neg-zero': 0,
    //warning
    "no-unused-vars": "warn",
    //disable
    "comma-dangle": "off",
    "no-useless-escape": "off",
    "no-mixed-spaces-and-tabs": "off"
  }
}
