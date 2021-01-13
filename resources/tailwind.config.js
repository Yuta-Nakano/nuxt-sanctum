module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  // purge: [],
  theme: {
    extend: {
      fontSize: {
        '2hxl': '1.625rem',
      },
    },
  },
  // separator: '-',
  variants: {
    backgroundColor: ['responsive', 'hover', 'focus', 'group-hover'], // 677
    borderColor: ['responsive', 'hover', 'focus', 'group-hover'],
    opacity: ['responsive', 'hover', 'focus', 'group-hover'], // 729
    textDecoration: ['responsive', 'hover', 'focus', 'group-hover'], // 750
    textColor: ['responsive', 'hover', 'focus', 'group-hover'], // 782
  },
  plugins: [
    function ({ addUtilities }) {
      const newUtilities = {
        '.opacity-80': {
          opacity: '0.8',
        },
        '.text-min': {
          fontSize: '10px',
        },
      }
      addUtilities(newUtilities, {
        variants: ['responsive', 'hover', 'focus', 'group-hover'],
      })
    },
  ],
}
