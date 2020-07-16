module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
      colors: {
        'blueone': '#1d3557',
        'bluetwo': '#457b9d',
        'bluethree': '#a8dadc',
        'umwhite': '#f1faee',
        'umred': '#e63946',
        'accountant' : '#e26d5c',
        'dean' : '#da627d',
        'bursary' : '#1a936f',
      },
      borderRadius: {
          'xs': '.125rem',
          's': '.25rem',
          'default': '.25rem',
          'm': '.5rem',
          'll': '1rem',
          'xl': '2rem',
          '2xl': '4rem',
          '3xl': '8rem',
          '4xl': '16rem',
          '5xl': '32rem',
          '6xl': '64rem',
      },
      spacing: {
          '72': '18rem',
          '84': '21rem',
          '96': '24rem',
          '108': '27rem',
          '120': '30rem',
          '132': '33rem',
          '144': '36rem',
          '156': '39rem',
          '168': '42rem',
          '180': '45rem',
          '192': '48rem',
      },
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/custom-forms')
  ]
}
